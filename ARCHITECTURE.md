# OMH Library architecture

The public information architecture intentionally keeps these as separate sections:

1. علوم
2. فنون درسی — religious/madrasa curriculum
3. کتاب‌های مکتب — grades 1–12 and school subjects

The database uses one hierarchical category table with a `section` discriminator and `parent_id`.
This prevents a future schema rewrite while keeping the three sections separate in the UI.

Book-to-category and book-to-author are many-to-many.
Book-to-volume is one-to-many.
Book commentary/annotation relationships are explicit in `book_relations`.

The project has no "latest books" homepage section. `updated_at` remains available for update sorting and future RSS/API use.
