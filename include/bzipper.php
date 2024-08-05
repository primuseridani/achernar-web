<?php addHeading("bzipper", "about"); ?>

<section>
	<p><em>bzipper</em> is a Rust crate for serialisation and deserialisation of binary streams.</p>
	<br>
	<p>See more at <code><a href="https://crates.io/crates/bzipper/">crates.io</a></code>.</p>
</section>

<?php addHeading("rationale", "rationale"); ?>

<section>
	<p>Contrary to <a href="https://crates.io/crates/serde/">Serde</a>/<a href="https://crates.io/crates/bincode/">Bincode</a>, the goal of this crate is to serialise data with a known size limit. Therefore, this crate may be more suited for networking or other cases where a fixed-sized buffer is needed.</p>
</section>

<?php addHeading("data model", "dataModel"); ?>

<section>
	<p>Most primitive types serialise losslessly, with the exception being <code>usize</code> and <code>isize</code>. These serialise as <code>u16</code> and <code>u32</code>, respectively, for portability reasons.</p>
	<br>
	<p>Unsized types, such as <code>str</code> and slices, are not supported. Instead, array should be used. For strings, the <code>FixedString</code> type is also provided.</p>
</section>

<?php addHeading("docs", "docs"); ?>

<section>
	<p>Documentation is written in-source. See <a href="https://docs.rs/pollex/latest/pollex/"><code>docs.rs</code></a> for a rendered instance.</p>
</section>
