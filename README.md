# My Tech Stack Theme

An ultra-lightweight, zero-bloat WordPress theme built specifically for developers, technical writers, and AI integrators. This theme was developed as a case study in maximizing performance by ditching heavy commercial frameworks and focusing on hardcoded logic, specific content archetypes, and inline SVG rendering.

## 🚀 The Philosophy: Performance and Purpose

Modern WordPress themes are Swiss Army knives; this theme is a scalpel. It is designed to do exactly two things: display standard blog content and showcase development projects (repositories and applications) with maximum efficiency.

By moving customization from the WordPress database into static PHP files and CSS variables, we achieve:

* Blazing-fast page load times.
* Zero dependencies on heavy page builders.
* Reduced attack vectors for enhanced security.

## ✨ Key Features

* **Bespoke Content Architypes:** Custom templates and styling for distinctive post types:
* **Blog:** Modern grid archive (`home.php`) and focused reading view (`single-post.php`).
* **Repositories:** Code-focused archive (`archive-repository.php`) and technical detail view (`single-repository.php`), including hardcoded metadata logic for GitHub links and developer-friendly code block styling.
* **Applications:** Showcase archive (`archive-application.php`) and product detail view (`single-application.php`), featuring hardcoded metadata logic for download links and version numbers.


* **Inline SVG Focus:** Optimized to use **"The Lightest Option"** for visuals: raw SVG code pasted directly into posts, requiring zero server image queries and offering perfect scalability.
* **Minimalist Design:** Clean graphite and magenta palette defined via CSS variables for easy performance tuning.
* **Dynamic standard pages** (`page.php`) and a custom, functional **404 error page** (`404.php`) with integrated search.

## ⚙️ Requirements & Technical Setup

This theme is **purpose-built** and expects a specific backend configuration to function. It does *not* include the logic to register the Custom Post Types; this is best handled via a separate functionality plugin or your `functions.php` file.

**You must register the following Custom Post Types:**

1. `repository` (singular: Repository)
2. `application` (singular: Application)

## 🛠️ Usage and Configuration

### Hardcoded Archive Links

To add the dynamic archives to your main navigation menu:

* Go to **Appearance > Menus**.
* Use the **Custom Links** panel.
* **Repositories Archive:** `[https://yourdomain.com/repositories/](https://yourdomain.com/repositories/)`
* **Applications Archive:** `[https://yourdomain.com/applications/](https://yourdomain.com/applications/)`

### Critical Metadata (Custom Fields)

The specialized Repository and Application templates rely on case-sensitive Custom Fields to display interactive buttons. Before publishing, you must enable Custom Fields in the block editor preferences.

**Required Keys for Repository Posts:**

* **`github_url`**: The URL to your raw source code. When present, it generates a "View Source on GitHub" button.

**Required Keys for Application Posts:**

* **`download_url`**: The direct link to your executable or application package. When present, it generates a "Download Application" button.
* **`app_version`**: The current semantic version of the application.

### Implementing The Lightest Visuals (Inline SVG)

This theme champions performance. When adding visuals to a blog post, do not upload heavy raster image files (JPEGs/PNGs). Instead, generate raw SVG XML code and paste it directly into a **Custom HTML** block. This guarantees instant rendering with zero asset bloat.

## 📄 License

This project is licensed under the GPL v2 or later License.

## 👨‍💻 Author

Developed by Sanjib Sinha and Gemini AI.

---
