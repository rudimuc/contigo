'use client';

import { useState, useEffect } from 'react';
import { useAuth } from '@/lib/auth';
import { LoginDialog } from './login-dialog';

export function AuthWrapper({ children }: { children: React.ReactNode }) {
    const { isAuthenticated } = useAuth();
    const [mounted, setMounted] = useState(false);

    useEffect(() => {
        setMounted(true);
    }, []);

    // Don't render anything until the component is mounted
    // This prevents hydration issues
    if (!mounted) {
        return null;
    }

    if (!isAuthenticated) {
        return <LoginDialog open={true} />;
    }

    return <>{children}</>;
}