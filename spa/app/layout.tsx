import './globals.css';
import type { Metadata } from 'next';
import { Inter } from 'next/font/google';
import { SiteHeader } from '@/components/layout/site-header';
import { ThemeProvider } from '@/components/theme-provider';
import { AuthWrapper } from '@/components/auth/auth-wrapper';

const inter = Inter({ subsets: ['latin'] });

export const metadata: Metadata = {
  title: 'Contigo',
  description: 'A modern media gallery application',
};

export default function RootLayout({
                                     children,
                                   }: {
  children: React.ReactNode;
}) {
  return (
      <html lang="en" suppressHydrationWarning>
      <body className={inter.className}>
      <ThemeProvider>
        <AuthWrapper>
          <div className="relative flex min-h-screen flex-col">
            <SiteHeader />
            <main className="flex-1">{children}</main>
          </div>
        </AuthWrapper>
      </ThemeProvider>
      </body>
      </html>
  );
}