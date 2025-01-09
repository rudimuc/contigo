import Link from 'next/link';
import { Button } from '@/components/ui/button';
import { useAuth } from '@/lib/auth';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { ChevronDown } from 'lucide-react';

interface NavigationLinksProps {
    onLoginClick: () => void;
}

export function NavigationLinks({ onLoginClick }: NavigationLinksProps) {
    const { isAuthenticated, setToken } = useAuth();

    const handleLogout = () => {
        setToken(null);
    };

    return (
        <>
            <Link
                href="/"
                className="text-sm font-medium transition-colors hover:text-primary"
            >
                Galleries
            </Link>
            <Link
                href="/recent"
                className="text-sm font-medium text-muted-foreground transition-colors hover:text-primary"
            >
                Recent
            </Link>
            <DropdownMenu>
                <DropdownMenuTrigger asChild>
                    <Button
                        variant="ghost"
                        className="text-sm font-medium text-muted-foreground"
                    >
                        Favorites
                        <ChevronDown className="ml-1 h-4 w-4" />
                    </Button>
                </DropdownMenuTrigger>
                <DropdownMenuContent>
                    <DropdownMenuItem asChild>
                        <Link href="/favorites/pictures">Pictures</Link>
                    </DropdownMenuItem>
                    <DropdownMenuItem asChild>
                        <Link href="/favorites/places">Places</Link>
                    </DropdownMenuItem>
                    <DropdownMenuItem asChild>
                        <Link href="/favorites/persons">Persons</Link>
                    </DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
            {isAuthenticated ? (
                <Button
                    variant="ghost"
                    className="text-sm font-medium text-muted-foreground"
                    onClick={handleLogout}
                >
                    Logout
                </Button>
            ) : (
                <Button
                    variant="ghost"
                    className="text-sm font-medium text-muted-foreground"
                    onClick={onLoginClick}
                >
                    Login
                </Button>
            )}
        </>
    );
}