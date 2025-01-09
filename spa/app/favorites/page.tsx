'use client';

import { useEffect, useState } from 'react';
import { MediaFile } from '@/types';
import { MediaGrid } from '@/components/media-grid';

export default function FavoritesPage() {
  const [mediaFiles, setMediaFiles] = useState<MediaFile[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    // In a real app, this would fetch favorited media files
    // For now, we'll simulate loading state
    const timer = setTimeout(() => {
      setMediaFiles([]);
      setLoading(false);
    }, 1000);

    return () => clearTimeout(timer);
  }, []);

  if (loading) {
    return (
      <div className="container py-8">
        <h1 className="mb-8 text-3xl font-bold">Favorites</h1>
        <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          {[...Array(8)].map((_, i) => (
            <div
              key={i}
              className="aspect-square animate-pulse rounded-lg bg-muted"
            />
          ))}
        </div>
      </div>
    );
  }

  return (
    <div className="container py-8">
      <h1 className="mb-8 text-3xl font-bold">Favorites</h1>
      {mediaFiles.length > 0 ? (
        <MediaGrid mediaFiles={mediaFiles} />
      ) : (
        <div className="flex min-h-[200px] items-center justify-center rounded-lg border-2 border-dashed">
          <p className="text-muted-foreground">No favorites yet</p>
        </div>
      )}
    </div>
  );
}