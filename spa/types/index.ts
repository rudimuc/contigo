export interface Gallery {
  id: string;
  name: string;
  description: string;
  previewImageId: number;
}

export interface MediaFile {
  id: string;
  "@type": 'Image' | 'Video' | 'gpx';
  storagename: string;
  url: string;
  rating?: number;
  title?: string;
  galleryId: string;
}