<?xml version="1.0" encoding="UTF-8" ?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>Välkommen Till Verkligheten!</title>
    <link href="http://mammaskallare.se" />
    <id>http://mammaskallare.se</id>
    <updated></updated>
    <author>
        <name>Mammas Källare</name>
        <email>kontakt@mammaskallare.se</email>
    </author>

    @foreach ($posts as $post)
    <entry>
        <title>{{ $post->title }}</title>
        <link href="{{ URL::to('/') . '/posts/' . $post->title }}"/>
        <summary type="html">{{{ $post->content }}}</summary>
        <pubDate>{{ $post->posted }}</pubDate>
    </entry>
    @endforeach
</feed>