'use client';

import { useState } from 'react';
import Link from 'next/link';
import { Image, Settings } from 'lucide-react';
import { MobileNav } from './mobile-nav';
import { SearchBar } from './search-bar';
import { NavigationLinks } from './navigation-links';
import { LoginDialog } from '@/components/auth/login-dialog';
import { SettingsDialog } from '@/components/settings/settings-dialog';
import { Button } from '@/components/ui/button';

export function SiteHeader() {
  const [loginOpen, setLoginOpen] = useState(false);
  const [settingsOpen, setSettingsOpen] = useState(false);

  const handleLoginClick = () => {
    setLoginOpen(true);
  };

  return (
      <header className="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
        <div className="container flex h-14 items-center">
          <div className="mr-4 flex items-center space-x-2">
            <MobileNav onLoginClick={handleLoginClick} />
            <Link href="/" className="flex items-center space-x-2">
              <Image className="h-6 w-6" />
              <span className="font-bold">Media Gallery</span>
            </Link>
          </div>
          <div className="hidden md:flex md:items-center md:space-x-4">
            <NavigationLinks onLoginClick={handleLoginClick} />
          </div>
          <div className="ml-auto flex items-center space-x-4">
            <SearchBar />
            <Button
                variant="ghost"
                size="icon"
                onClick={() => setSettingsOpen(true)}
            >
              <Settings className="h-5 w-5" />
            </Button>
          </div>
        </div>
        <LoginDialog open={loginOpen} onOpenChange={setLoginOpen} />
        <SettingsDialog open={settingsOpen} onOpenChange={setSettingsOpen} />
      </header>
  );
}