import Head from "next/head";
import Image from "next/image";
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";

import { DataTable } from "@/components/ui/data-table";
import { columns } from "./columns";
import { Button } from "@/components/ui/button";
import Link from "next/link";

async function getFilmData() {
  const res = await fetch("http://localhost:9000/api/film/all");
  const allPostData = await res.json();

  return allPostData;
}

export default async function Home() {
    const data = await getFilmData();
    return (
      <Card className="container mx-auto px-4 bg-zinc-400 shadow-md shadow-zinc-950">
        <CardHeader>
          <CardTitle className="text-4xl">Filmek</CardTitle>
          <CardDescription className="text-lg text-zinc-50">Az adatbázisban elérhető filmek listája</CardDescription>
        </CardHeader>
        <CardContent>
          <DataTable columns={columns} data={data} />
        </CardContent>
        <CardFooter>
            <Button asChild className="cursor-pointer">
              <Link href="/">Vissza</Link>
            </Button>
        </CardFooter>
      </Card>
    );
  }
  
