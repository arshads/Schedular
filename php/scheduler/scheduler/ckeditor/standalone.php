		<p>
			<label for="editor1">
				Editor 1:</label>
		</p>
		<p>
		<?php
			// Include the CKEditor class.
			include_once "ckeditor.php";
			// The initial value to be displayed in the editor.
			$initialValue = '<p>This is some <strong>sample text</strong>.</p>';
			// Create a class instance.
			$CKEditor = new CKEditor();
			// Path to the CKEditor directory, ideally use an absolute path instead of a relative dir.
			//$CKEditor->basePath = '/ckeditor/'
			// If not set, CKEditor will try to detect the correct path.
			$CKEditor->basePath = '';
			// Create a textarea element and attach CKEditor to it.
			$CKEditor->editor("editor1", $initialValue);
		?>  	