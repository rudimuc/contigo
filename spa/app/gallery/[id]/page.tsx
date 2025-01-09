import { GalleryView } from '@/components/gallery/gallery-view';

export default function GalleryPage({
                                        params,
                                    }: {
    params: { id: string };
}) {
    return <GalleryView galleryId={params.id} />;
}