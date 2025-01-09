import { Gallery } from '@/types';
import { Card, CardContent } from './ui/card';
import Link from 'next/link';

interface GalleryCardProps {
  gallery: Gallery;
}

export function GalleryCard({ gallery }: GalleryCardProps) {
  return (
    <Link href={`/gallery/${gallery.id}`}>
      <Card className="group overflow-hidden transition-all hover:ring-2 hover:ring-primary">
        <CardContent className="p-0">
          <div className="aspect-video relative">
            <img
              src={gallery.previewImageId === null ? "" : "http://contigo2.rudionline.com:8000/media/object/"+gallery.previewImageId + "/gall"}
              alt={gallery.name}
              className="h-full w-full object-cover transition-transform group-hover:scale-105"
            />
            <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent" />
            <h3 className="absolute bottom-4 left-4 text-xl font-semibold text-white">
              {gallery.name}
            </h3>
          </div>
        </CardContent>
      </Card>
    </Link>
  );
}