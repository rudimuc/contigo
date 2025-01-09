'use client';

import { MediaFile } from '@/types';
import { MapViewer } from '@/components/map/map-viewer';

interface MediaViewerProps {
  file: MediaFile;
  className?: string;
}

export function MediaViewer({ file, className }: MediaViewerProps) {
  switch (file.type) {
    case 'image':
      return (
        <img
          src={file.url}
          alt={file.title || ''}
          className={`max-h-[80vh] w-auto ${className || ''}`}
        />
      );
    case 'video':
      return (
        <video
          src={file.url}
          controls
          className={`max-h-[80vh] w-auto ${className || ''}`}
        />
      );
    case 'gpx':
      return <MapViewer gpxUrl={file.url} className={className} />;
    default:
      return <div>Unsupported media type</div>;
  }
}