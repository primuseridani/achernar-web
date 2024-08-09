<?php add_heading("bzipper", "about"); ?>

<section>
	<p><em>bzipper</em> is a Rust crate for serialisation and deserialisation of binary streams.</p>
	<br>
	<p>See more at <code><a href="https://crates.io/crates/bzipper/">crates.io</a></code>.</p>
</section>

<?php add_heading("Rationale", "rationale"); ?>

<section>
	<p>Contrary to <a href="https://crates.io/crates/serde/">Serde</a>/<a href="https://crates.io/crates/bincode/">Bincode</a>, the goal of this crate is to serialise data with a known size limit. Therefore, this crate may be more suited for networking or other cases where a fixed-sized buffer is needed.</p>
</section>

<?php add_heading("Data model", "dataModel"); ?>

<section>
	<p>Most primitive types serialise losslessly, with the exception being <code>usize</code> and <code>isize</code>. These serialise as <code>u16</code> and <code>u32</code>, respectively, for portability reasons.</p>
	<br>
	<p>Unsized types, such as <code>str</code> and slices, are not supported. Instead, array should be used. For strings, the <code>FixedString</code> type is also provided.</p>
</section>

<?php add_heading("Usage", "usage"); ?>

<section>
	<p>This crate revolves around the <code>Serialise</code> and <code>Deserialise</code> traits, both of which work around streams (more specifically, d-streams and s-streams).</p>
	<br>
	<p>Many core types come implemented with bzipper, including primitives as well as some standard library types such as <code>Option</code> and <code>Result</code>.</p>
</section>

<?php add_heading("Serialisation", "serialisation"); ?>

<section>
	<p>To serialise an object implementing <code>Serialise</code>, simply allocate a so-called &ldquo;s-stream&rdquo; (short for <em>serialisation stream</em>) with the <code>Sstream</code> type:</p>
	<br>
	<p class="codeblock">let mut buf: [u8; 16] = Default::default();<br><br>let mut stream = bzipper::Sstream::new(&mut buf);</p>
	<br>
	<p>The resulting stream is immutable in the sense that it cannot grow its buffer, altough it does keep track of the buffer's state.</p>
	<br>
	<p>A byte sequence can be added to our new stream by passing the stream to a call to the <code>serialise</code> method:</p>
	<br>
	<p class="codeblock">use bzipper::Serialise;<br><br>let mut buf: [u8; 2] = Default::default();<br>let mut stream = bzipper::Sstream::new(&mut buf);<br><br>0x4554_u16.serialise(&mut stream).unwrap();</p>
	<br>
	<p>The ammount of bytes used by the serialiser (that is, the ammount of bytes written to the stream) is indicated by its return value (i.e. it has the type <code>Result<usize, Serialise::Error></code>).</p>
	<br>
	<p>Whilst the <em>maximum</em> ammount of bytes is specified by the <code>SERIALISE_LIMIT</code> constant, this can in cases be lower (for example with <code>None</code> variants which are always encoded as a single, null byte).</p>
	<br>
	<p>When serialising primitives, the resulting byte stream is in big endian (a.k.a. network endian). It is recommended for implementors to adhere to this convention as well.</p>
	<br>
	<p>After serialisation, the s-stream records the new write-to position of the buffer. This allows for <em>chaining</em> of serialisations, which can prove useful when implementing the trait for custom types.</p>
</section>

<?php add_heading("Deserialisation", "deserialisation"); ?>

<section>
	<p>As with serialisation, deserialisation uses streams (just with the <code>Dstream</code> type; short for <em>deserialisation stream</em>):</p>
	<br>
	<p class="codeblock">let data = [0x45, 0x54];<br><br>let mut stream = bzipper::Dstream::new(&data);</p>
	<br>
	<p>Using these streams is also just as simple as with s-streams:</p>
	<br>
	<p class="codeblock">use bzipper::Deserialise;<br><br>let data = [0x45, 0x54];<br>let mut stream = bzipper::Dstream::new(&data);<br><br>assert_eq!(u16::deserialise(&mut stream).unwrap(), 0x4554);</p>
	<br>
	<p>When chaining serialisations, keep in mind that appropriate deserialisations should come in <strong>reverse order</strong> (streams function similarly to stacks in this sense).</p>
</section>

<?php add_heading("Docs", "docs"); ?>

<section>
	<p>Documentation is written in-source. See <a href="https://docs.rs/pollex/latest/pollex/">Docs.rs</a> for a rendered instance.</p>
</section>
