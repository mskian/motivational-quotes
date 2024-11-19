import json

def read_json_file(file_path):
    with open(file_path, 'r') as file:
        return json.load(file)

def write_json_file(file_path, data):
    with open(file_path, 'w', encoding='utf-8') as file:
        json.dump(data, file, indent=4, ensure_ascii=False)

def remove_duplicates(data):
    seen_quotes = set()
    seen_ids = set()
    unique_data = []
    
    for item in data['motivational_quotes']:
        if item['quote'] not in seen_quotes and item['id'] not in seen_ids:
            unique_data.append(item)
            seen_quotes.add(item['quote'])
            seen_ids.add(item['id'])
    
    data['motivational_quotes'] = unique_data
    return data

data = read_json_file('db.json')

cleaned_data = remove_duplicates(data)

write_json_file('quotes.json', cleaned_data)

print("Duplicates removed. Updated data saved to 'quotes.json'.")
