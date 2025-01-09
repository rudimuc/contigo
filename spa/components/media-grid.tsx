'use client';

import { useState } from 'react';
import { MediaFile } from '@/types';
import { Card, CardContent } from './ui/card';
import { Lightbox } from './ui/lightbox';
import { useToast } from '@/hooks/use-toast';
import { deleteMediaFile, updateMediaFileRating } from '@/lib/api';
import { MediaTypeIndicator } from './media/media-type-indicator';
import { useSettings } from '@/lib/settings';

interface MediaGridProps {
  mediaFiles: MediaFile[];
}

export function MediaGrid({ mediaFiles }: MediaGridProps) {
  const [selectedFile, setSelectedFile] = useState<MediaFile | null>(null);
  const { toast } = useToast();
  const { squareImages } = useSettings();

  const handleDelete = async (id: string) => {
    try {
      await deleteMediaFile(id);
      toast({
        title: 'Media file deleted',
        description: 'The media file has been successfully deleted.',
      });
      setSelectedFile(null);
    } catch (error) {
      toast({
        title: 'Error',
        description: 'Failed to delete the media file.',
        variant: 'destructive',
      });
    }
  };

  const handleRate = async (id: string, rating: number) => {
    try {
      await updateMediaFileRating(id, rating);
      toast({
        title: 'Rating updated',
        description: 'The rating has been successfully updated.',
      });
    } catch (error) {
      toast({
        title: 'Error',
        description: 'Failed to update the rating.',
        variant: 'destructive',
      });
    }
  };

  return (
    <>
      <div className="grid grid-cols-2 gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-4">
        {mediaFiles.map((file) => (
          <Card
            key={file.id}
            className="group cursor-pointer overflow-hidden"
            onClick={() => setSelectedFile(file)}
          >
            <CardContent className="p-0">
              <div className="relative">
                <MediaTypeIndicator type={file["@type"]} />
                <img
                  src={"http://contigo2.rudionline.com:8000/media/object/" + file.id + "/250y"}
                  alt={file.title || 'Media preview'}
                  className={`w-full transition-transform group-hover:scale-105 ${
                    squareImages ? 'aspect-square object-cover' : 'h-auto'
                  }`}
                />
              </div>
            </CardContent>
          </Card>
        ))}
      </div>

      {selectedFile && (
        <Lightbox
          mediaFile={selectedFile}
          onClose={() => setSelectedFile(null)}
          onDelete={handleDelete}
          onRate={handleRate}
        />
      )}
    </>
  );
}