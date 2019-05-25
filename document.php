<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="node_modules/froala-editor/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="node_modules/froala-editor/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <style>
    body {
      text-align: center;
    }

    div#editor {
      width: 81%;
      margin: auto;
      text-align: left;
    }

    .ss {
      background-color: red;
    }
  </style>
</head>
<body>

<div id="editor">
	<div id='edit'>
		<h1>Full Featured</h1>

      <p>This is the full featured Froala WYSIWYG HTML editor.</p>

      <img class="fr-fir fr-dii" src="../../img/photo1.jpg" alt="Old Clock" width="300" />Lorem <strong>ipsum</strong>
      dolor sit amet, consectetur <strong>adipiscing <em>elit.</em> Donec</strong> facilisis diam in odio iaculis
      blandit. Nunc eu mauris sit amet purus <strong>viverra</strong><em> gravida</em> ut a dui.<br />
      <ul>
        <li>Vivamus nec rutrum augue, pharetra faucibus purus. Maecenas non orci sagittis, vehicula lorem et, dignissim
          nunc.</li>
        <li>Suspendisse suscipit, diam non varius facilisis, enim libero tincidunt magna, sit amet iaculis eros libero
          sit amet eros. Vestibulum a rhoncus felis.<ol>
            <li>Nam lacus nulla, consequat ac lacus sit amet, accumsan pellentesque risus. Aenean viverra mi at urna
              mattis fermentum.</li>
            <li>Curabitur porta metus in tortor elementum, in semper nulla ullamcorper. Vestibulum mattis tempor tortor
              quis gravida. In rhoncus risus nibh. Nullam condimentum dapibus massa vel fringilla. Sed hendrerit sed est
              quis facilisis. Ut sit amet nibh sem. Pellentesque imperdiet mollis libero.</li>
          </ol>
        </li>
      </ul>

      <table style="width: 100%;">
        <tr>
          <td style="width: 25%;"></td>
          <td style="width: 25%;"></td>
          <td style="width: 25%;"></td>
          <td style="width: 25%;"></td>
        </tr>
        <tr>
          <td style="width: 25%;"></td>
          <td style="width: 25%;"></td>
          <td style="width: 25%;"></td>
          <td style="width: 25%;"></td>
        </tr>
      </table>

      <a href="http://google.com" title="Aenean sed hendrerit">Aenean sed hendrerit</a> velit. Nullam eu mi dolor.
      Maecenas et erat risus. Nulla ac auctor diam, non aliquet ante. Fusce ullamcorper, ipsum id tempor lacinia, sem
      tellus malesuada libero, quis ornare sem massa in orci. Sed dictum dictum tristique. Proin eros turpis, ultricies
      eu sapien eget, ornare rutrum ipsum. Pellentesque eros nisl, ornare nec ipsum sed, aliquet sollicitudin erat.
      Nulla tincidunt porta <strong>vehicula.</strong><br />


	</div>
 	
</div>






<script type="text/javascript" src="node_modules/froala-editor/js/froala_editor.pkgd.min.js"></script>

  <script>
    (function () {
      new FroalaEditor("#edit")
    })()
  </script>

</body>
</html>