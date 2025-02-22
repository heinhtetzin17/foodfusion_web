class gallary {
  constructor() {
    document.addEventListener("DOMContentLoaded", () => {
      this.modal();
    });
  }

  modal() {
    const parentElement = document.querySelector(".gallery-container"); // Update this to match your HTML class
    if (!parentElement) {
      console.warn("Gallery container element not found");
      return;
    }
    parentElement.addEventListener("click", (e) => {
      if (e.target.parentElement.classList.contains("itemBox")) {
        const cat = e.target.parentElement.getAttribute("data-cat");
        const src = e.target.parentElement.children;
        let imgsrc;
        for (let i = 0; i < src.length; i++) {
          if (src[i].nodeName == "IMG") {
            imgsrc = src[i].getAttribute("src");
          }
        }
        this.createElement(imgsrc, cat);

        document.querySelector(".icon").addEventListener("click", (e) => {
          this.removeStyle();
        });
      }
    });
  }
  createElement(src, cat) {
    const popdiv = document.createElement("div");
    popdiv.setAttribute("class", "preview-box show");
    const n2 = document.createElement("div");
    n2.setAttribute("class", "shadow show");

    const dynamicHeight = document.querySelector("header").clientHeight;

    popdiv.innerHTML = `
			  	 	<div class="details">
				      <span class="title">Food Category: <p>${cat}</p></span>
				      <span class="icon fas fa-times"></span>
				    </div>
				    <div class="image-box"><img src="${src}" alt=""></div>
				  
			  `;
    document.body.appendChild(popdiv);
    document.body.appendChild(n2);
  }
  style() {}
  removeStyle() {
    document.querySelector("html").style.overflow = "inherit";
    const rv = document.querySelector(".preview-box.show");
    const sd = document.querySelector(".shadow.show");
    document.body.removeChild(rv);
    document.body.removeChild(sd);
  }
}
const Gallary = new gallary();

// Add event listeners to filter buttons
document.querySelectorAll(".filter-btn").forEach((button) => {
  button.addEventListener("click", () => {
    // Remove active class from all buttons
    document.querySelectorAll(".filter-btn").forEach((btn) => {
      btn.classList.remove("active");
    });

    // Add active class to clicked button
    button.classList.add("active");

    // Get the filter value
    const filterValue = button.getAttribute("data-filter");

    // Filter the recipe boxes
    document.querySelectorAll(".box").forEach((box) => {
      if (
        filterValue === "all" ||
        box.getAttribute("data-category") === filterValue
      ) {
        box.style.display = "block";
      } else {
        box.style.display = "none";
      }
    });
  });
});
