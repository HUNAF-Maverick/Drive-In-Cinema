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

async function getData() {
  const res = await fetch("http://localhost:9000/api/film/all");
  const allPostData = await res.json();

  return allPostData;
}

export default async function Home() {
    const data = await getData();
    return (
      <Card>
        <CardHeader>
          <CardTitle>List of films</CardTitle>
          <CardDescription>Films available in db</CardDescription>
        </CardHeader>
        <CardContent>
          <DataTable columns={columns} data={data} />
        </CardContent>
        <CardFooter>
          
        </CardFooter>
      </Card>
    );
  }
  
