document.getElementById("submitFile").addEventListener("click", function() {
    let files = document.getElementById("fileJson").files;
    console.log(files);
    if (files.length <= 0) {
        return;
    }

    let fr = new FileReader();

    fr.onload = async function(e) {
        let formattedFile = JSON.parse(e.target.result);

        const response = await axios.post(
            "http://localhost:8000/api/notices/",
            formattedFile,
            { headers: { "Content-Type": "application/json" } }
        );

        console.log(response);
    };

    fr.readAsText(files[0]);
});
