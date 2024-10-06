import type { Metadata } from "next";
import localFont from "next/font/local";
import "./globals.css";

const geistSans = localFont({
  src: "./fonts/GeistVF.woff",
  variable: "--font-geist-sans",
  weight: "100 900",
});
const geistMono = localFont({
  src: "./fonts/GeistMonoVF.woff",
  variable: "--font-geist-mono",
  weight: "100 900",
});

export const metadata: Metadata = {
  title: "Drive-In Cinema",
  description: "Drive-In Cinema's page",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      
      <body
        className={`${geistSans.variable} ${geistMono.variable} bg-zinc-800 text-primary-foreground antialiased`}
      >
        <div className="w-full p-4 my-2 text-center"><p className="text-6xl text-white uppercasefont-semibold">Drive-In Cinema</p></div>
        {children}
      </body>
    </html>
  );
}
