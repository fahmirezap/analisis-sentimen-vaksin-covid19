from flask import Flask, render_template, Response, request
import pandas as pd

app = Flask(__name__)

@app.route("/")
def main():
    return render_template('index.html')

@app.route("/menu_dataset")
def menu_dataset():
    return render_template('dataset.html')

@app.route("/menu_preprocessing")
def menu_preprocessing():
    return render_template('preprocessing.html')

import re
import nltk
import pickle
from nltk.corpus import stopwords
nltk.download('punkt')
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory

@app.route("/sentimen", methods=["GET"])
def sentimen():
    user_data =  request.args.get("sub")
    user_data = str(user_data)
    teks = user_data
    def cleansing(text):
      text = text.lower()
      #_menghapus URL_
      text = re.sub(r'http[s]?\:\/\/.[a-zA-Z0-9\.\/\_?=%&#\-\+!]+',' ',text)
      #_menghapus username
      text = re.sub('@[^\s]+','', text)
      #_konversi hastag ke kalimat
      text = re.sub(r'((?<=[a-z])[A-Z]|[A-Z](?=[a-z]))', ' \\1', text)
      #_menghapus punctuation dan emoticon
      text = re.sub('[^\w\s]+', '', text)
      #_menghapus whitespace
      text = re.sub('[\s]+',' ', text)
      #_koreksi duplikasi tiga karakter beruntun
      text = re.sub(r'([a-zA-Z])\1\1','\\1', text)
      #_menghapus angka
      text = re.sub('\d{0,9}','', text)
      #Tokenizing
      text = nltk.tokenize.word_tokenize(text)
      #Remove Stopword
      nltk.download('stopwords')
      list_stopwords = stopwords.words('indonesian')
      temp = []
      for t in text:
        if t not in list_stopwords:
          temp.append(t)
      #Stemming
      factor_stemming = StemmerFactory()
      stemmer = factor_stemming.create_stemmer()
      text=temp
      word_stemm = []
      for t in text:
        word_stemm.append(stemmer.stem(t))
      return text
    
    normalized_word = pd.read_csv("kamus.csv")
    
    normalized_word_dict = {}
    
    for index, row in normalized_word.iterrows():
        if row[0] not in normalized_word_dict:
            normalized_word_dict[row[0]] = row[1] 
    
    def normalized_term(document):
        return [normalized_word_dict[term] if term in normalized_word_dict else term for term in document]
    
    import ast
    def join_text_list(texts):
        texts = ast.literal_eval(texts)
        return ' '.join([text for text in texts])
    
    user_data = cleansing(user_data)
    user_data = normalized_term(user_data)
    user_data = str(user_data)
    user_data = join_text_list(user_data)
    user_data = [user_data]
    
    load_bow = pickle.load(open('cv.pkl', 'rb'))
    tes =  load_bow.transform(user_data)
    
    load_tfidf = pickle.load(open('tfidf.pkl', 'rb'))
    data =  load_tfidf.transform(tes)
    data = data.toarray()
    
    load_model = pickle.load(open('model_nbc.pkl', 'rb'))
    prediction = load_model.predict(data)
    proba = load_model.predict_proba(data)[0]
    probabilitasnb = proba
    probabilitasnb_new = "[Negatif : {:.3f}] | [Positif : {:.3f}] | [Netral : {:.3f}]".format(probabilitasnb[0], probabilitasnb[-1], probabilitasnb[1])
    probabilitasnbm = probabilitasnb_new
    if prediction == ["Negatif"]:
        hasil_klasifikasi = "Negatif"
    elif prediction == ["Positif"]:
        hasil_klasifikasi = "Positif"
    else:
        hasil_klasifikasi = "Netral"
    if data is not None:
        try:
            return render_template('sentimen.html', hasil_klasifikasi = hasil_klasifikasi, teks = teks, probabilitasnbm=probabilitasnbm)
        except Exception as e:
            print(f"kesalahan: {e}")
    else:
        return render_template('sentimen.html', teks = teks)

@app.route("/menu_sentimen", methods=["GET"])
def menu_sentimen():
    try:
        return render_template("sentimen.html")
    except Exception as e:
        print(f"kesalahan function API menu_sentimen: {e}")

@app.route("/menu_datatest")
def menu_datatest():
    return render_template('data_test.html')

@app.route("/menu_grafik")
def menu_grafik():
    return render_template('grafik.html')

@app.route('/dataset', methods=["POST"])
def dataset():
    df1 = pd.read_csv("dataset.csv")
    return Response(df1.to_html(index=False))

@app.route('/datatest', methods=["POST"])
def datatest():
    df1 = pd.read_csv("dataset test.csv")
    return Response(df1.to_html(index=False))

@app.route('/preprocessing', methods=["POST"])
def preprocessing():
    df2 = pd.read_csv("preprocessing.csv")
    return Response(df2.to_html(index=False))

if __name__ == '__main__':
    app.run(debug=True, port=5000, host="localhost")