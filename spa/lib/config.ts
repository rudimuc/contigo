// API configuration
export const API_BASE_URL = 'http://contigo2.rudionline.com:8000/api';

// Feature flags
export const USE_SAMPLE_DATA = false;

// Endpoints
export const ENDPOINTS = {
  galleries: `${API_BASE_URL}/galleries`,
  getGalleryMedia: (id: string) => `${API_BASE_URL}/galleries/${id}/mediaobjects`,
} as const;