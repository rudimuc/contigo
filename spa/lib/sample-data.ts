import { Gallery, MediaFile } from '@/types';

export const sampleGalleries: Gallery[] = [
  {
    id: '1',
    name: 'Nature Photography',
    previewUrl: 'https://images.unsplash.com/photo-1472214103451-9374bd1c798e',
  },
  {
    id: '2',
    name: 'City Walks',
    previewUrl: 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000',
  },
  {
    id: '3',
    name: 'Hiking Adventures',
    previewUrl: 'https://images.unsplash.com/photo-1551632811-561732d1e306',
  },
];

export const sampleMediaFiles: Record<string, MediaFile[]> = {
  '1': [
    {
      id: '1',
      type: 'image',
      previewUrl: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05',
      url: 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05',
      rating: 4,
      title: 'Mountain Vista',
      galleryId: '1',
    },
    {
      id: '2',
      type: 'video',
      previewUrl: 'https://images.unsplash.com/photo-1682687220742-aba13b6e50ba',
      url: 'https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/360/Big_Buck_Bunny_360_10s_1MB.mp4',
      title: 'Nature Video',
      galleryId: '1',
    },
  ],
  '2': [
    {
      id: '3',
      type: 'image',
      previewUrl: 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000',
      url: 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000',
      rating: 5,
      title: 'City Sunset',
      galleryId: '2',
    },
    {
      id: '4',
      type: 'gpx',
      previewUrl: 'https://images.unsplash.com/photo-1551632811-561732d1e306',
      url: 'https://openlayers.org/en/latest/examples/data/gpx/fells_loop.gpx',
      title: 'City Walk Route',
      galleryId: '2',
    },
  ],
};