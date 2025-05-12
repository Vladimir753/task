SET search_path TO public;

CREATE TABLE IF NOT EXISTS public.articles (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
