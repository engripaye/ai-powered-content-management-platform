# Base image
FROM python:3.11-slim

# Set working directory
WORKDIR /app

# Copy requirements (dependencies)
COPY requirements.txt .

# Install dependencies
RUN pip install --no-cache-dir -r requirements.txt

# Copy application code
COPY ./app ./app

# Expose FastAPI port
EXPOSE 8000

# Run FastAPI with uvicorn
CMD ["uvicorn", "app.main:app", "--host", "0.0.0.0", "--port", "8000"]
