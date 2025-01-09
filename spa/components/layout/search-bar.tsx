'use client';

import { useState, useRef, useEffect } from 'react';
import { Search } from 'lucide-react';
import { Input } from '@/components/ui/input';
import { useDebounce } from '@/hooks/use-debounce';
import { searchMedia } from '@/lib/api';
import { MediaFile } from '@/types';
import Link from 'next/link';

export function SearchBar() {
  const [query, setQuery] = useState('');
  const [results, setResults] = useState<MediaFile[]>([]);
  const [isLoading, setIsLoading] = useState(false);
  const [isOpen, setIsOpen] = useState(false);
  const searchRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    function handleClickOutside(event: MouseEvent) {
      if (searchRef.current && !searchRef.current.contains(event.target as Node)) {
        setIsOpen(false);
      }
    }

    document.addEventListener('mousedown', handleClickOutside);
    return () => document.removeEventListener('mousedown', handleClickOutside);
  }, []);

  const debouncedSearch = useDebounce(async (value: string) => {
    if (!value.trim()) {
      setResults([]);
      return;
    }

    setIsLoading(true);
    try {
      const data = await searchMedia(value);
      setResults(data['hydra:member']);
    } catch (error) {
      console.error('Search failed:', error);
    } finally {
      setIsLoading(false);
    }
  }, 300);

  const handleSearch = (value: string) => {
    setQuery(value);
    setIsOpen(true);
    debouncedSearch(value);
  };

  const handleResultClick = () => {
    setIsOpen(false);
    setQuery('');
    setResults([]);
  };

  return (
      <div className="relative w-full max-w-sm" ref={searchRef}>
        <div className="relative">
          <Search className="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />
          <Input
              type="search"
              placeholder="Search media..."
              className="pl-9"
              value={query}
              onChange={(e) => handleSearch(e.target.value)}
              onFocus={() => setIsOpen(true)}
          />
        </div>

        {isOpen && (query || isLoading) && (
            <div className="absolute top-full z-50 mt-2 w-full rounded-md border bg-background p-2 shadow-lg">
              {isLoading ? (
                  <div className="p-2 text-sm text-muted-foreground">Searching...</div>
              ) : results.length > 0 ? (
                  <div className="max-h-[300px] space-y-1 overflow-auto">
                    {results.map((file) => (
                        <Link
                            key={file.id}
                            href={`/gallery/${file.galleryId}`}
                            className="block rounded-sm p-2 hover:bg-accent"
                            onClick={handleResultClick}
                        >
                          <div className="flex items-center gap-2">
                            <img
                                src={file.previewUrl}
                                alt={file.title || ''}
                                className="h-8 w-8 rounded object-cover"
                            />
                            <span className="text-sm">{file.title}</span>
                          </div>
                        </Link>
                    ))}
                  </div>
              ) : (
                  <div className="p-2 text-sm text-muted-foreground">
                    No results found
                  </div>
              )}
            </div>
        )}
      </div>
  );
}