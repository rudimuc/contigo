'use client';

import { useEffect, useState } from 'react';
import { MediaFile } from '@/types';
import { MediaGrid } from '@/components/media-grid';
import { fetchGallery, fetchMediaFiles } from '@/lib/api';
import { ArrowLeft } from 'lucide-react';
import Link from 'next/link';
import { GalleryLoading } from './gallery-loading';

interface GalleryViewProps {
  galleryId: string;
}

export function GalleryView({ galleryId }: GalleryViewProps) {
  const [mediaFiles, setMediaFiles] = useState<MediaFile[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
  const [galleryName, setGalleryName] = useState('');

  useEffect(() => {
    const loadGalleryData = async () => {
      try {
        const [gallery, mediaData] = await Promise.all([
          fetchGallery(galleryId),
          fetchMediaFiles(galleryId),
        ]);

        setGalleryName(gallery.name);
        setMediaFiles(mediaData);
      } catch (err) {
        setError('Failed to load gallery content');
      } finally {
        setLoading(false);
      }
    };

    loadGalleryData();
  }, [galleryId]);

  if (loading) {
    return <GalleryLoading />;
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
      <div className="mb-8 flex items-center gap-4">
        <Link
          href="/"
          className="flex items-center gap-2 text-muted-foreground hover:text-foreground"
        >
          <ArrowLeft className="h-4 w-4" />
          Back to Galleries
        </Link>
        <h1 className="text-3xl font-bold">{galleryName}</h1>
      </div>
      <MediaGrid mediaFiles={mediaFiles} />
    </div>
  );
}