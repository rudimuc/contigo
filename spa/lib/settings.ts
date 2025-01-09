'use client';

import { create } from 'zustand';
import { persist } from 'zustand/middleware';

interface SettingsState {
    squareImages: boolean;
    setSquareImages: (value: boolean) => void;
}

export const useSettings = create<SettingsState>()(
    persist(
        (set) => ({
            squareImages: true,
            setSquareImages: (value) => set({ squareImages: value }),
        }),
        {
            name: 'user-settings',
        }
    )
);