<?php addHeading("agbsum", "about"); ?>

<section>
	<p><em>agbsum</em> is a command line utility for patching AGB images.</p>
</section>

<?php addHeading("Specs", "specs"); ?>

<section>
	<p>All AGB images have a header at offsets <code>0x00-0xE3</code> (inclusive), of which (29) bytes in <code>0xA0-0xBD</code> denote metadata.</p>
	<br>
	<p>The first byte after this sequence holds a checksum of the metadata, which if invalid, the device bootloader will usually reject the entire image.</p>
</section>

<?php addHeading("Compatibility", "compatibility"); ?>

<section>
	<p><em>agbsum</em> is written in <strong>C99</strong> and uses makefiles as its build system. It has been tested to compile under Clang, GCC, and the <a href="https://bellard.org/tcc/">Tiny C Compiler</a> (altough the latter may have problems with the standard library). Both GNU Make (<code>gmake</code>) and BSD Make (<code>bmake</code>).</p>
	<br>
	<p>In theory, all &ldquo;UNIX-like&rdquo; systems (including older ones) should be supported. Please open a bug report if you experience otherwise.</p>
</section>
