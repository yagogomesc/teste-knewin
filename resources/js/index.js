const noticeListContainer = document.getElementById("notices-list");

const getNotices = async () => {
    return await axios.get("http://localhost:8000/api/notices/titles");
};

if (noticeListContainer) {
    const noticesList = async () => {
        const notices = await getNotices();
        const listGroup = document.querySelector(".list-group");

        if (notices.data.length > 0) {
            listGroup.innerHTML = "";
            const noticeLinkElement = document.createElement("a");
            noticeLinkElement.classList.add(
                "list-group-item",
                "list-group-item-action"
            );

            let noticeLink = "http://localhost:8000/notices/show/";

            notices.data.forEach(notice => {
                noticeLinkElement.addEventListener(
                    "click",
                    event => (event.target.href = noticeLink + notice.id)
                );
                noticeLinkElement.href = noticeLink + notice.id;

                noticeLinkElement.innerText = notice.titulo;
                console.log(noticeLinkElement);
                listGroup.insertAdjacentHTML(
                    "beforeend",
                    noticeLinkElement.outerHTML
                );
            });
        } else {
            const noticeText = document.createElement("h3");
            noticeText.classList.add("p-4");
            noticeText.innerText =
                "Ainda não possuimos nenhuma noticia cadastrada.";
            listGroup.insertAdjacentHTML("beforeend", noticeText.outerHTML);
        }
    };

    noticesList();
}
