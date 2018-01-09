/**
 * https://zhuanlan.zhihu.com/p/32297229
 */

public class Solution {
	public boolean canPartition(int[] nums){
        int len = nums.length;
		int sum = 0;

		for(int i = 0; i < len; i++){
			sum += nums[i];
		}

		if(sum %2 == 1){
			return false;
		}

		sum /= 2;

		boolean [] dp = new boolean[20000];
		for(int i = 0; i <= sum; i++){
			dp[i] = false;
		}

		dp[0] = true;
		for(int i = 0; i < len; i++){
			//边界条件: j >= num[i]
            for(int j = sum; j >= nums[i]; j--){
				// dp[j]表示第i轮迭代能否得到和为j的子数组
				// 第i 轮多加了 nums[i], 所以上一轮的和应该是:prev = j - mums[i]
				// 上一轮能否迭代到和为prev的字符组,记为: dp[prev]
				// 相邻两轮的的结果一定是互斥的
				dp[j] |= dp[j - nums[i]];
			}
		}

		return dp[sum];

	}

    public static void main(String[] args){
		Solution s = new Solution();
        int[] nums = {1,2,3,5};
		boolean can = s.canPartition(nums);
	    System.out.println("{1,2,3,5} can be divide into two subarray with the same sum:" + can);
        int[] nums2 = {1,5,11,5};
		can = s.canPartition(nums2);
	    System.out.println("{1,5,11,5} can be divide into two subarray with the same sum:" + can);
	}
}

