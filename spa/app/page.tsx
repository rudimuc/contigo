'use client';

import { useEffect, useState } from 'react';
import { Gallery } from '@/types';
import { GalleryCard } from '@/components/gallery-card';
import { fetchGalleries } from '@/lib/api';

export default function Home() {
  const [galleries, setGalleries] = useState<Gallery[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const loadGalleries = async () => {
      try {
        const data = await fetchGalleries();
        setGalleries(data['hydra:member']);
      } catch (err) {
        setError('Failed to load galleries');
      } finally {
        setLoading(false);
      }
    };

    loadGalleries();
  }, []);

  if (loading) {
    return (
      <div className="container py-8">
        <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
          {[...Array(6)].map((_, i) => (
            <div
              key={i}
              className="aspect-video animate-pulse rounded-lg bg-muted"
            />
          ))}
        </div>
      </div>
    );
  }

  if (error) {
    return (
      <div className="container flex min-h-[50vh] items-center justify-center">
        <div className="text-center">
          <h2 className="text-2xl font-bold text-destructive">{error}</h2>
          <p className="mt-2 text-muted-foreground">
            Please try again later or contact support if the problem persists.
          </p>
        </div>
      </div>
    );
  }

  return (
    <div className="container py-8">
      <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        {galleries.map((gallery) => (
          <GalleryCard key={gallery.id} gallery={gallery} />
        ))}
      </div>
    </div>
  );
}