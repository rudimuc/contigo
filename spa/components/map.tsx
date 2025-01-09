'use client';

import { useEffect, useRef } from 'react';
import 'ol/ol.css';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import VectorLayer from 'ol/layer/Vector';
import VectorSource from 'ol/source/Vector';
import GPX from 'ol/format/GPX';

interface MapProps {
  gpxUrl: string;
  className?: string;
}

export default function MapComponent({ gpxUrl, className }: MapProps) {
  const mapRef = useRef<HTMLDivElement>(null);
  const mapInstanceRef = useRef<Map | null>(null);

  useEffect(() => {
    if (!mapRef.current) return;

    const vectorSource = new VectorSource({
      url: gpxUrl,
      format: new GPX(),
    });

    const vectorLayer = new VectorLayer({
      source: vectorSource,
    });

    const map = new Map({
      target: mapRef.current,
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

    mapInstanceRef.current = map;

    vectorSource.on('addfeature', () => {
      const extent = vectorSource.getExtent();
      map.getView().fit(extent, { padding: [50, 50, 50, 50] });
    });

    return () => {
      map.setTarget(undefined);
    };
  }, [gpxUrl]);

  return <div ref={mapRef} className={className} />;
}