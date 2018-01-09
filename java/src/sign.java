public JSONObject signKye(JSONObject params) {
        String accessToken;
        String organizationCode = params.getString("kye");
        String accesskey = params.getString("accesskey");
        params.remove("kye");
        params.remove("accesskey");

        // 拼接字符串
        ArrayList<String> paramsList = new ArrayList<>();
        LinkedHashMap<String, String> jsonMap = JSON.parseObject(params.toString(),
                new TypeReference<LinkedHashMap<String, String>>() {});
        for (Map.Entry<String, String> entry : jsonMap.entrySet()) {
            if (entry.getValue()!= null && entry.getValue().length() > 0) {
                paramsList.add(entry.getKey() + entry.getValue());
            }
        }
        Collections.sort(paramsList);
        StringBuilder signString = new StringBuilder();
        for (String str : paramsList) {
            signString.append(str);
        }
        Common common = new Common();
        accessToken = common.GetMD5(accesskey + signString.toString()).toUpperCase();

        System.out.println("accessToken" + accessToken);
        JSONObject returns = new JSONObject();
        returns.put("params", params);
        JSONObject publicParams = new JSONObject();
        String timestamp = Common.timeStamp();
        publicParams.put("Timestamp", timestamp);
        publicParams.put("kye", organizationCode);
        publicParams.put("access-token", accessToken);
        returns.put("public", publicParams);

        return returns;
    }
