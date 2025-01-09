import { Camera, Compass, Image } from 'lucide-react';
import { MediaFile } from '@/types';

interface MediaTypeIndicatorProps {
  type: MediaFile['@type'];
}

export function MediaTypeIndicator({ type }: MediaTypeIndicatorProps) {
  const Icon = {
    Image: Image,
    Video: Camera,
    gpx: Compass,
  }[type];

  return (
    <div className="absolute left-2 top-2 rounded-full bg-black/50 p-1.5 backdrop-blur-sm">
      <Icon className="h-4 w-4 text-white" />
    </div>
  );
}