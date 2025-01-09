'use client';

import { useEffect, useRef } from 'react';
import dynamic from 'next/dynamic';

interface MapViewerProps {
  gpxUrl: string;
  className?: string;
}

export function MapViewer({ gpxUrl, className }: MapViewerProps) {
  const containerRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    // Only load OpenLayers on the client side
    if (typeof window !== 'undefined' && containerRef.current) {
      import('ol/Map').then(({ default: Map }) => {
        import('ol/View').then(({ default: View }) => {
          import('ol/layer/Tile').then(({ default: TileLayer }) => {
            import('ol/source/OSM').then(({ default: OSM }) => {
              import('ol/layer/Vector').then(({ default: VectorLayer }) => {
                import('ol/source/Vector').then(({ default: VectorSource }) => {
                  import('ol/format/GPX').then(({ default: GPX }) => {
                    const vectorSource = new VectorSource({
                      url: gpxUrl,
                      format: new GPX(),
                    });

                    const vectorLayer = new VectorLayer({
                      source: vectorSource,
                    });

                    const map = new Map({
                      target: containerRef.current!,
                      layers: [
                        new TileLayer({
                          source: new OSM(),
                        }),
                        vectorLayer,
                      ],
                      view: new View({
                        center: [0, 0],
                        zoom: 2,
                      }),
                    });

                    vectorSource.on('addfeature', () => {
                      const extent = vectorSource.getExtent();
                      map.getView().fit(extent, { padding: [50, 50, 50, 50] });
                    });

                    return () => {
                      map.setTarget(undefined);
                    };
                  });
                });
              });
            });
          });
        });
      });
    }
  }, [gpxUrl]);

  return (
    <div 
      ref={containerRef} 
      className={`min-h-[400px] ${className || ''}`}
      style={{ width: '100%' }}
    />
  );
}