"use client"

import { ColumnDef } from "@tanstack/react-table"

export type Film = {
    id: string
    title: string
    age_classification: string
    language: string
    cover_image: string
}

export const columns: ColumnDef<Film>[] = [
    {
        accessorKey: "id",
        header: "Azonosító"
    },
    {
        accessorKey: "title",
        header: "Cím"
    },
    {
        accessorKey: "age_classification",
        header: "Korhatár besorolás"
    },
    {
        accessorKey: "language",
        header: "Nyelv"
    },
    {
        accessorKey: "cover_image",
        header: "Borító"
    }
]