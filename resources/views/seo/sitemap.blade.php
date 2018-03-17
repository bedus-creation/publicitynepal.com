<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
  <url> 
    <loc>http://publicitynepal.com</loc> 
    <image:image>
       <image:loc>http://example.com/images/logo.png</image:loc>
       <image:caption>Publicitynepal.com's Logo</image:caption>
    </image:image>
  </url>
  @foreach($posts as $item)
  <url> 
    <loc>http://publicitynepal.com/news/{{$item->slug}}</loc> 
    <image:image>
       <image:loc>http://publicitynepal.com/uploads/images/{{$item->featured_photo}}</image:loc>
       <image:caption>{{$item->title}} Featured Images</image:caption>
    </image:image>
  </url>
  @endforeach
</urlset>