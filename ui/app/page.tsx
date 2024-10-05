import Head from "next/head";
import Image from "next/image";

import { Button } from "@/components/ui/button";
import Link from "next/link";

export default function Home() {
  return (
    <div>
      <div>
        <h2>Kérlek válassz az alábbi lehetőségek közül</h2>
      </div>
      <div>
        <Button asChild>
          <Link href="/films">Filmek listázása</Link>
        </Button>
      </div>
    </div>
  );
}
