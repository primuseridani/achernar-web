<?php add_heading("bzipper", "about"); ?>

<section>
	<p><a href="https://crates.io/crates/bzipper/">bzipper</a> is a binary (de)serialiser for the Rust language.</p>
	<br>
	<p>Contrary to <a href="https://crates.io/crates/serde/">Serde</a>/<a href="https://crates.io/crates/bincode/">Bincode</a>, the goal of bzipper is to serialise with a known size constraint. Therefore, this crate may be more suited for networking or other cases where a fixed-sized buffer is needed.</p>
	<br>
	<p>Keep in mind that this project is still work-in-progress.</p>
	<br>
	<p>This crate is compatible with <code>no_std</code>.</p>
</section>

<?php add_heading("Data model", "dataModel"); ?>

<section>
	<p>Most primitive types serialise losslessly, with the exception being <code>usize</code> and <code>isize</code>. These serialise as <code>u32</code> and <code>i32</code>, respectively, for portability reasons.</p>
	<br>
	<p>Unsized types, such as <code>str</code> and slices, are not supported. Instead, arrays should be used. For strings, the <code>FixedString</code> type is also provided.</p>
</section>

<?php add_heading("Usage", "usage"); ?>

<section>
	<p>This crate revolves around the <code>Serialise</code> and <code>Deserialise</code> traits, both of which are commonly used in conjunction with streams (more specifically, s-streams and d-streams).</p>
	<br>
	<p>Many core types come implemented with bzipper, including primitives as well as some standard library types such as <code>Option</code> and <code>Result</code>.</p>
	<br>
	<p>It is recommended in most cases to just derive these traits for custom types (enumerations and structures only). Here, each field is chained in declaration order:</p>
	<br>
	<p class="codeblock">use bzipper::{Deserialise, Serialise};<br><br>#[derive(Debug, Deserialise, PartialEq, Serialise)]<br>struct IoRegister {<br>&nbsp;&nbsp;&nbsp;&nbsp;addr:&nbsp;&nbsp;u32,<br>&nbsp;&nbsp;&nbsp;&nbsp;value: u16,<br>}<br><br>let mut buf: [u8; IoRegister::SERIALISED_SIZE] = Default::default();<br>IoRegister { addr: 0x04000000, value: 0x0402 }.serialise(&mut buf).unwrap();<br><br>assert_eq!(buf, [0x04, 0x00, 0x00, 0x00, 0x04, 0x02]);<br><br>assert_eq!(IoRegister::deserialise(&buf).unwrap(), IoRegister { addr: 0x04000000, value: 0x0402 });</p>
</section>

<?php add_heading("Serialisation", "serialisation"); ?>

<section>
	<p>To serialise an object implementing <code>Serialise</code>, simply allocate a buffer for the serialisation. The required size of any given serialisation is specified by the <code>SERIALISED_SIZE</code> constant:</p>
	<br>
	<p class="codeblock">use bzipper::Serialise;<br><br>let mut buf: [u8; char::SERIALISED_SIZE] = Default::default();<br>'&#1046;'.serialise(&mut buf).unwrap();<br><br>assert_eq!(buf, [0x00, 0x00, 0x04, 0x16]);</p>
	<br>
	<p>The only special requirement of the <code>serialise</code> method is that the provided byte slice has an element count of exactly <code>SERIALISED_SIZE</code>.</p>
	<br>
	<p>We can also use streams to <em>chain</em> multiple elements together:</p>
	<br>
	<p class="codeblock">use bzipper::Serialise;<br><br>let mut buf: [u8; char::SERIALISED_SIZE * 5] = Default::default();<br>let mut stream = bzipper::Sstream::new(&mut buf);<br><br>stream.append(&'&#1604;');<br>stream.append(&'&#1575;');<br>stream.append(&'&#1605;');<br>stream.append(&'&#1583;');<br>stream.append(&'&#1575;');<br><br>assert_eq!(buf, [0x00, 0x00, 0x06, 0x44, 0x00, 0x00, 0x06, 0x27, 0x00, 0x00, 0x06, 0x45, 0x00, 0x00, 0x06, 0x2F, 0x00, 0x00, 0x06, 0x27]);</p>
	<br>
	<p>When serialising primitives, the resulting byte stream is in big endian (a.k.a. network endian). It is recommended for implementors to adhere to this convention as well.</p>
</section>

<?php add_heading("Deserialisation", "deserialisation"); ?>

<section>
	<p>Deserialisation works with an almost identical syntax to serialisation.</p>
	<br>
	<p>To deserialise a buffer, simply call the <code>deserialise</code> method:</p>
	<br>
	<p class="codeblock">use bzipper::Deserialise;<br><br>let data = [0x45, 0x54];<br>assert_eq!(<u16>::deserialise(&data).unwrap(), 0x4554);</p>
	<br>
	<p>Just like with serialisations, the <code>Dstream</code> can be used to deserialise chained elements:</p>
	<br>
	<p class="codeblock">use bzipper::Deserialise;<br><br>let data = [0x45, 0x54];<br>let stream = bzipper::Dstream::new(&data);<br><br>assert_eq!(stream.take::<u8>().unwrap(), 0x45);<br>assert_eq!(stream.take::<u8>().unwrap(), 0x54);</p>
</section>

<?php add_heading("Docs", "docs"); ?>

<section>
	<p>Documentation is written in-source. See <a href="https://docs.rs/bzipper/latest/bzipper/">Docs.rs</a> for a rendered instance.</p>
</section>
