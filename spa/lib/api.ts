import { Gallery, MediaFile } from '@/types';
import { API_BASE_URL, ENDPOINTS, USE_SAMPLE_DATA } from './config';
import { sampleGalleries, sampleMediaFiles } from './sample-data';
import { useAuth } from './auth';

export async function loginUser(username: string, password: string) {
  try {
    const response = await fetch(`${API_BASE_URL}/login_check`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ username, password }),
    });

    if (!response.ok) {
      throw new Error('Login failed');
    }

    const data = await response.json();
    return data.token;
  } catch (error) {
    console.error('Login error:', error);
    throw error;
  }
}

export function getAuthHeaders() {
  const token = useAuth.getState().token;
  return {
    'Content-Type': 'application/json',
    ...(token ? { Authorization: `Bearer ${token}` } : {}),
  };
}

export async function fetchGalleries(): Promise<{ 'hydra:member': Gallery[] }> {
  if (USE_SAMPLE_DATA) {
    return Promise.resolve({ 'hydra:member': sampleGalleries });
  }

  try {
    const response = await fetch(ENDPOINTS.galleries, {
      headers: getAuthHeaders(),
      cache: 'no-store', // Disable caching to prevent RSC payload issues
    });

    if (!response.ok) throw new Error('Failed to fetch galleries');
    return response.json();
  } catch (error) {
    console.error('Fetch galleries error:', error);
    throw error;
  }
}

export async function fetchGallery(id: string): Promise<Gallery> {
  if (USE_SAMPLE_DATA) {
    const gallery = sampleGalleries.find(g => g.id === id);
    if (!gallery) throw new Error('Gallery not found');
    return Promise.resolve(gallery);
  }

  try {
    const response = await fetch(`${ENDPOINTS.galleries}/${id}`, {
      headers: getAuthHeaders(),
      cache: 'no-store',
    });

    if (!response.ok) throw new Error('Failed to fetch gallery');
    return response.json();
  } catch (error) {
    console.error('Fetch gallery error:', error);
    throw error;
  }
}

export async function fetchMediaFiles(galleryId: string): Promise<MediaFile[]> {
  if (USE_SAMPLE_DATA) {
    return Promise.resolve(
       sampleMediaFiles[galleryId] || []
    );
  }

  try {
    const response = await fetch(ENDPOINTS.getGalleryMedia(galleryId), {
      headers: getAuthHeaders(),
      cache: 'no-store',
    });

    if (!response.ok) throw new Error('Failed to fetch media files');
    return response.json();
  } catch (error) {
    console.error('Fetch media files error:', error);
    throw error;
  }
}