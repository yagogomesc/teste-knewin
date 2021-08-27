const noticeContainer = document.getElementById("notice-container");

const getNotice = async id => {
    return await axios.get("http://localhost:8000/api/notices/show/" + id);
};

if (noticeContainer) {
    let url = window.location.pathname;
    let id = url.substring(url.lastIndexOf("/") + 1);
    const noticeDetails = async id => {
        const { data } = await getNotice(id);

        //Notice Header
        const noticeHeader = document.createElement("div");
        noticeHeader.classList.add("notice-header");

        //Notice titulo
        const noticeTitle = document.createElement("h1");
        noticeTitle.classList.add("display-4", "fw-bold");
        noticeTitle.innerText = data.titulo;

        //Notice subtitulo
        const noticeSubtitle = document.createElement("h1");
        noticeSubtitle.classList.add("display-5");
        noticeSubtitle.innerText = data.subtitulo;

        //Fonte do texto
        const fontText = document.createElement("h5");
        fontText.classList.add("pl-4");
        fontText.innerText = "Fonte: ";

        //Link da fonte da noticia
        const fontLink = document.createElement("a");
        fontLink.classList.add("text-reset");
        fontLink.addEventListener("click", event => {
            event.target.href = data.url;
        });
        fontLink.href = data.url;
        fontLink.innerText = data.fonte;

        //Data de publicação
        const published = document.createElement("h5");
        published.classList.add("pl-4");
        const formattedDate = new Date(data.data_publicacao.date);

        published.innerText =
            "Publicado em: " + formattedDate.toLocaleString("pt-BR");

        noticeHeader.insertAdjacentHTML("beforeend", noticeTitle.outerHTML);
        noticeHeader.insertAdjacentHTML("beforeend", noticeSubtitle.outerHTML);

        noticeContainer.insertAdjacentHTML(
            "beforeend",
            noticeHeader.outerHTML + "<hr/>"
        );

        fontText.insertAdjacentHTML("beforeend", fontLink.outerHTML);

        noticeContainer.insertAdjacentHTML("beforeend", fontText.outerHTML);

        noticeContainer.insertAdjacentHTML("beforeend", published.outerHTML);

        const textBody = document.createElement("p");
        textBody.classList.add("lead", "text-start", "notice-content");
        textBody.innerHTML = data.conteudo;

        noticeContainer.insertAdjacentHTML("beforeend", textBody.outerHTML);
    };

    noticeDetails(id);
}
