from flask import Flask, request, jsonify
from transformers import pipeline

app = Flask(__name__)
sentiment_analyzer = pipeline("sentiment-analysis")

@app.route('/analyze', methods=['POST'])
def analyze():
    data = request.json
    comment = data.get('comment')
    if comment:
        result = sentiment_analyzer(comment)[0]['label']
        return jsonify({"sentiment": result})
    return jsonify({"error": "No comment provided"}), 400

if __name__ == '__main__':
    app.run(debug=True)
