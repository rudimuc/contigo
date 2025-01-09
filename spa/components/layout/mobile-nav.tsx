'use client';

import { useState } from 'react';
import { Menu } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet';
import { NavigationLinks } from './navigation-links';

interface MobileNavProps {
    onLoginClick: () => void;
}

export function MobileNav({ onLoginClick }: MobileNavProps) {
    const [isOpen, setIsOpen] = useState(false);

    const handleLoginClick = () => {
        setIsOpen(false); // Close the mobile menu
        onLoginClick(); // Trigger the login dialog
    };

    return (
        <Sheet open={isOpen} onOpenChange={setIsOpen}>
            <SheetTrigger asChild>
                <Button variant="ghost" size="icon" className="md:hidden">
                    <Menu className="h-5 w-5" />
                    <span className="sr-only">Toggle menu</span>
                </Button>
            </SheetTrigger>
            <SheetContent side="left" className="w-[300px] sm:w-[400px]">
                <nav className="flex flex-col space-y-4">
                    <NavigationLinks onLoginClick={handleLoginClick} />
                </nav>
            </SheetContent>
        </Sheet>
    );
}