<?php
$token = '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';
$repositoryOwner = 'sh20raj';
$repositoryName = 'cdns20';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $file = $_FILES['file'];

    // Prepare the file data for GitHub release upload
    $content = file_get_contents($file['tmp_name']);
    $base64Content = base64_encode($content);

    // Create the release using GitHub Releases API
    $releaseUrl = "https://api.github.com/repos/{$repositoryOwner}/{$repositoryName}/releases";
    $releaseData = [
        'tag_name' => 'v'.time(), // Replace this with your desired release tag/version
        'target_commitish' => 'main', // Replace this with your desired branch
        'name' => 'Release v1.0.0'.time(), // Replace this with your desired release name
        'body' => 'Release notes and description go here.', // Replace this with your desired release description
        'draft' => false,
        'prerelease' => false,
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\nAuthorization: token {$token}",
            'method'  => 'POST',
            'content' => json_encode($releaseData),
        ],
    ];

    $context = stream_context_create($options);
    $releaseResult = file_get_contents($releaseUrl, false, $context);

    // Decode the JSON response for the release creation
    $releaseResponse = json_decode($releaseResult, true);

    // Check if the release creation was successful
    if (isset($releaseResponse['id'])) {
        // Upload the asset (file) to the release using GitHub Releases API
        $uploadUrl = $releaseResponse['upload_url'];
        $uploadUrl = str_replace('{?name}', "?name={$file['name']}", $uploadUrl);

        $uploadData = [
            'name' => $file['name'],
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/octet-stream\r\nAuthorization: token {$token}",
                'method'  => 'POST',
                'content' => $content,
            ],
        ];

        $context = stream_context_create($options);
        $uploadResult = file_get_contents($uploadUrl, false, $context);

        // Decode the JSON response for the asset upload
        $uploadResponse = json_decode($uploadResult, true);

        // Check if the asset upload was successful
        if (isset($uploadResponse['browser_download_url'])) {
            // Return the JSON response with the release details
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'release_url' => $releaseResponse['html_url']]);
        } else {
            // Return the JSON response with the error message for asset upload
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'error' => 'Asset upload failed.']);
        }
    } else {
        // Return the JSON response with the error message for release creation
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Release creation failed.']);
    }
}
?>