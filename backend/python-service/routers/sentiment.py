from fastapi import APIRouter
from pydantic import BaseModel
from app.services.sentiment_service import analyze_sentiment

router = APIRouter()

class SentimentRequest(BaseModel):
    text: str

@router.post("/sentiment")
def sentiment_analysis(request: SentimentRequest):
    result = analyze_sentiment(request.text)
    return {"text": request.text, "sentiment": result}
