export default function Loading() {
  return (
    <div className="container py-8">
      <h1 className="mb-8 text-3xl font-bold">Favorites</h1>
      <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        {[...Array(8)].map((_, i) => (
          <div
            key={i}
            className="aspect-square animate-pulse rounded-lg bg-muted"
          />
        ))}
      </div>
    </div>
  );
}