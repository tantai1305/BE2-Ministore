ClassicEditor
	.create( document.querySelector( '.editor1' ), {
		// Editor configuration.
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( handleSampleError );

	ClassicEditor
	.create( document.querySelector( '.editor2' ), {
		// Editor configuration.
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( handleSampleError );

function handleSampleError( error ) {
	const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

	const message = [
		'Oops, something went wrong!',
		`Please, report the following error on ${ issueUrl } with the build id "tkbd93haya4y-ho0s01sv034b" and the error stack trace:`
	].join( '\n' );

	console.error( message );
	console.error( error );
}
