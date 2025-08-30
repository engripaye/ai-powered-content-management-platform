from fastapi import FastAPI
from routers import sentiment

app = FastAPI(title="AI Microservice")

# Register Routers
app.include_router(sentiment.router, prefix="/api/v1", tags=["Sentiment"])

@app.get("/")
def root():
    return {"message": "AI Service Running"}
