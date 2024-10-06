import Head from "next/head";
import Image from "next/image";

import { Button } from "@/components/ui/button";
import Link from "next/link";
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";

export default function Home() {
  return (
    <Card className="container mx-auto px-4 bg-zinc-400 shadow-md shadow-zinc-950">
        <CardHeader>
          <CardTitle className="text-4xl">Főoldal</CardTitle>
          <CardDescription className="text-lg text-zinc-50">Kérlek válassz az alábbi lehetőségek közül</CardDescription>
        </CardHeader>
        <CardContent>
          <div className="flex justify-center">
            <div className="basis-auto w-96 text-center">
              <Button asChild className="cursor-pointer">
                <Link href="/films">Filmek listázása</Link>
              </Button>
            </div>
            <div className="basis-auto w-96 text-center">
              <Button asChild className="cursor-pointer">
                <Link href="/screenings">Vetítések listázása</Link>
              </Button>
            </div>
          </div>
        </CardContent>
        <CardFooter>
        </CardFooter>
      </Card>
  );
}
