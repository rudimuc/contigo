'use client';

import { useState } from 'react';
import { X, Star, Trash2, ExternalLink } from 'lucide-react';
import { Dialog, DialogContent } from './dialog';
import { Button } from './button';
import { MediaFile } from '@/types';
import dynamic from 'next/dynamic';

const Map = dynamic(() => import('@/components/map'), { ssr: false });

interface LightboxProps {
  mediaFile: MediaFile;
  onClose: () => void;
  onDelete: (id: string) => void;
  onRate: (id: string, rating: number) => void;
}

export function Lightbox({ mediaFile, onClose, onDelete, onRate }: LightboxProps) {
  const [rating, setRating] = useState(mediaFile.rating || 0);

  const renderContent = () => {
    switch (mediaFile.type) {
      case 'image':
        return (
          <img
            src={mediaFile.url}
            alt={mediaFile.title || 'Image'}
            className="max-h-[80vh] w-auto object-contain"
          />
        );
      case 'video':
        return (
          <video
            controls
            className="max-h-[80vh] w-auto"
            src={mediaFile.url}
          />
        );
      case 'gpx':
        return <Map gpxUrl={mediaFile.url} className="h-[80vh] w-full" />;
      default:
        return null;
    }
  };

  return (
    <Dialog open onOpenChange={() => onClose()}>
      <DialogContent className="max-w-[90vw] p-0">
        <div className="relative">
          <Button
            variant="ghost"
            size="icon"
            className="absolute right-2 top-2 z-50"
            onClick={onClose}
          >
            <X className="h-4 w-4" />
          </Button>
          <div className="min-h-[200px]">{renderContent()}</div>
          <div className="flex items-center justify-between border-t bg-background p-4">
            <div className="flex gap-2">
              {[1, 2, 3, 4, 5].map((value) => (
                <Button
                  key={value}
                  variant="ghost"
                  size="icon"
                  onClick={() => {
                    setRating(value);
                    onRate(mediaFile.id, value);
                  }}
                >
                  <Star
                    className={`h-4 w-4 ${
                      value <= rating ? 'fill-yellow-400' : ''
                    }`}
                  />
                </Button>
              ))}
            </div>
            <div className="flex gap-2">
              <Button
                variant="destructive"
                size="icon"
                onClick={() => onDelete(mediaFile.id)}
              >
                <Trash2 className="h-4 w-4" />
              </Button>
              <Button
                variant="outline"
                size="icon"
                asChild
              >
                <a href={`/media/${mediaFile.id}`}>
                  <ExternalLink className="h-4 w-4" />
                </a>
              </Button>
            </div>
          </div>
        </div>
      </DialogContent>
    </Dialog>
  );
}