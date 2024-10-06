"use client"

import { ColumnDef } from "@tanstack/react-table"

export type Screening = {
    id: string
    date: string
    available_seats: number
    film_id: string
}

export const columns: ColumnDef<Screening>[] = [
    {
        accessorKey: "id",
        header: "Azonosító"
    },
    {
        accessorKey: "date",
        header: "Dátum"
    },
    {
        accessorKey: "available_seats",
        header: "Elérhető helyek száma"
    },
    {
        accessorKey: "film_id",
        header: "Film"
    },

]